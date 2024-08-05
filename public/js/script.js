document.addEventListener('DOMContentLoaded', () => {
    const conversation_id = localStorage.getItem('conversation_id') || 0;
    const user_id = localStorage.getItem('user_id');

    if (conversation_id && user_id) {
        loadConversationMessages(conversation_id);
    }
});

function hideDefaultText(status) {
    console.log('Function "Hide" called')
    // Select all elements with the class 'default-chat' within the chat container
    const defaultChatContainer = document.querySelector('.default-chat');
    console.log('Hiding default chat elements:', status); // Debug logging

    defaultChatContainer.style.display = status ? 'none' : 'block';

}


function loadConversationMessages(conversation_id) {
    fetch(`/api/conversation/${conversation_id}/messages`)
        .then(response => response.json())
        .then(data => {
            if (data.status && data.messages.length) {
                hideDefaultText(true);
                const chatContainer = document.querySelector('.chat .d-flex.flex-column-reverse');
                data.messages.forEach(message => {
                    const messageHTML = `
                        ${message.sender === 'user' ? 
                            `<div class="d-flex chat-message">
                                <div class="d-flex mb-2 justify-content-end flex-1">
                                    <div class="w-100 w-xxl-75">
                                        <div class="d-flex flex-end-center hover-actions-trigger">
                                            <div class="chat-message-content me-2">
                                                <div class="mb-1 sent-message-content bg-primary rounded-2 p-3 text-white" data-bs-theme="light">
                                                    <p class="mb-0 fw-semibold fs-9">${message.message}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <p class="mb-0 fs-10 text-body-tertiary text-opacity-85 fw-semibold">Just now</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                             :
                             `<div class="d-flex chat-message">
                                <div class="d-flex mb-2 flex-1">
                                    <div class="w-100 w-xxl-75">
                                        <div class="d-flex hover-actions-trigger">
                                            <div class="avatar avatar-m me-3 flex-shrink-0">
                                                <img class="rounded-circle" src="../logo/gemini.png" alt="">
                                            </div>
                                            <div class="chat-message-content received me-2">
                                                <div class="mb-1 received-message-content border rounded-2 p-3">
                                                    <p class="mb-0 fw-semibold fs-9">${marked.parse(message.message)}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mb-0 fs-10 text-body-tertiary text-opacity-85 fw-semibold ms-7">Just now</p>
                                    </div>
                                </div>
                            </div>`

                        }
                    `;
                    chatContainer.insertAdjacentHTML('afterbegin', messageHTML);
                });
            }
        })
        .catch(error => {
            console.error('Error fetching conversation messages:', error);
        });
}

function generateResponse() {
    const user_id = localStorage.getItem('user_id');
    const conversation_id = localStorage.getItem('conversation_id') || 0;

    if (!user_id) {
        console.error('User ID or Conversation ID is missing');
        return;
    }
    const input_message = document.getElementById('input_message').value;
    if (!input_message.trim()) {
        console.error('Message is empty');
        return;
    }

    hideDefaultText(true);

    // Display the user's message
    const chatContainer = document.querySelector('.chat .d-flex.flex-column-reverse');
    const userMessageHTML = `
        <div class="d-flex chat-message">
            <div class="d-flex mb-2 justify-content-end flex-1">
                <div class="w-100 w-xxl-75">
                    <div class="d-flex flex-end-center hover-actions-trigger">
                        <div class="chat-message-content me-2">
                            <div class="mb-1 sent-message-content bg-primary rounded-2 p-3 text-white" data-bs-theme="light">
                                <p class="mb-0 fw-semibold fs-9">${input_message}</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="mb-0 fs-10 text-body-tertiary text-opacity-85 fw-semibold">Just now</p>
                    </div>
                </div>
            </div>
        </div>
    `;
    chatContainer.insertAdjacentHTML('afterbegin', userMessageHTML);

    // Call the API to get the response from Gemini
    fetch('/api/execute-gemi', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            text: input_message,
            user_id: user_id,
            conversation_id: conversation_id
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data)
        if (data.bot_response) {
            localStorage.setItem('conversation_id', data.conversation_id)
            // Convert Markdown to HTML
            const responseHTML = `
                <div class="d-flex chat-message">
                    <div class="d-flex mb-2 flex-1">
                        <div class="w-100 w-xxl-75">
                            <div class="d-flex hover-actions-trigger">
                                <div class="avatar avatar-m me-3 flex-shrink-0">
                                    <img class="rounded-circle" src="../logo/gemini.png" alt="">
                                </div>
                                <div class="chat-message-content received me-2">
                                    <div class="mb-1 received-message-content border rounded-2 p-3">
                                        <p class="mb-0 fw-semibold fs-9">${marked.parse(data.bot_response)}</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-0 fs-10 text-body-tertiary text-opacity-85 fw-semibold ms-7">Just now</p>
                        </div>
                    </div>
                </div>
            `;
            chatContainer.insertAdjacentHTML('afterbegin', responseHTML);
        } else {
            console.error('No response text received from API');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });

    // Clear the input field
    document.getElementById('input_message').value = '';
}
