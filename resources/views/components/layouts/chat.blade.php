<div class="support-chat-container">
  <div class="container-fluid support-chat">
    <div class="card bg-body-emphasis">
      <div class="card-header d-flex flex-between-center px-4 py-3 border-bottom border-translucent">
        <h5 class="mb-0 d-flex align-items-center gap-2">GCare<span class="fa-solid fa-circle text-success fs-11"></span></h5>
        <div class="btn-reveal-trigger">
          <button class="btn btn-link p-0 dropdown-toggle dropdown-caret-none transition-none d-flex" type="button" id="support-chat-dropdown" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
            <span class="fas fa-ellipsis-h text-body"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-end py-2" aria-labelledby="support-chat-dropdown">
            <a class="dropdown-item" href="#!" onclick="newChat()">New Chat</a>
            <a class="dropdown-item" href="{{ route('app.dash.map') }}">Get nearest hospital</a>
            <a class="dropdown-item" href="{{route('app.dash.chat-history')}}">Show history</a>
            <a class="dropdown-item" href="#!">Report to Admin</a>
            <a class="dropdown-item btn-support-chat" href="#!">Close Support</a>
          </div>
        </div>
      </div>
      <div class="card-body chat p-0">
        <div class="d-flex flex-column-reverse scrollbar h-100 p-3">
          <div class="text-end mt-6">
            <div class="default-chat">
              <a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                <p class="mb-0 fw-semibold fs-9">I need help with something</p>
                <span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
              </a>
              <a onclick='submit()' class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                <p class="mb-0 fw-semibold fs-9">I can’t reorder a product I previously ordered</p>
                <span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
              </a>
              <a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                <p class="mb-0 fw-semibold fs-9">How do I place an order?</p>
                <span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
              </a>
              <a class="mb-2 false d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                <p class="mb-0 fw-semibold fs-9">My payment method not working</p>
                <span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
              </a>
            </div>
            {{-- <div class='dialogue'></div> --}}
          </div>
          {{-- <div>
            <div class="d-flex chat-message">
              <div class="d-flex mb-2 justify-content-end flex-1">
                <div class="w-100 w-xxl-75">
                  <div class="d-flex flex-end-center hover-actions-trigger">
                    <div class="d-sm-none hover-actions align-self-center me-2 start-0">
                      <div class="bg-body-emphasis rounded-pill d-flex align-items-center border px-2 actions">
                        <button class="btn p-2" type="button"><span class="fa-solid fa-reply text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-pen-to-square text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-trash text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-share text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-face-smile text-primary"></span></button>
                      </div>
                    </div>
                    <div class="d-none d-sm-flex">
                      <div class="hover-actions position-relative align-self-center">
                        <button class="btn p-2 fs-10"><span class="fa-solid fa-reply text-primary"></span></button>
                        <button class="btn p-2 fs-10"><span class="fa-solid fa-pen-to-square text-primary"></span></button>
                        <button class="btn p-2 fs-10"><span class="fa-solid fa-share text-primary"></span></button>
                        <button class="btn p-2 fs-10"><span class="fa-solid fa-trash text-primary"></span></button>
                        <button class="btn p-2 fs-10"><span class="fa-solid fa-face-smile text-primary"></span></button>
                      </div>
                    </div>
                    <div class="chat-message-content me-2">
                      <div class="mb-1 sent-message-content bg-primary rounded-2 p-3 text-white" data-bs-theme="light">
                        <p class="mb-0">How are you today?</p>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <p class="mb-0 fs-10 text-body-tertiary text-opacity-85 fw-semibold">Yesterday, 10 AM</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex chat-message">
              <div class="d-flex mb-2 flex-1">
                <div class="w-100 w-xxl-75">
                  <div class="d-flex hover-actions-trigger">
                    <div class="avatar avatar-m me-3 flex-shrink-0"><img class="rounded-circle" src="../assets/img/team/20.webp" alt=""></div>
                    <div class="chat-message-content received me-2">
                      <div class="mb-1 received-message-content border rounded-2 p-3">
                        <p class="mb-0" id="response">Great! As usual, ready to help you</p>
                      </div>
                    </div>
                    <div class="d-none d-sm-flex">
                      <div class="hover-actions position-relative align-self-center me-2">
                        <button class="btn p-2 fs-10"><span class="fa-solid fa-reply"></span></button>
                        <button class="btn p-2 fs-10"><span class="fa-solid fa-trash"></span></button>
                        <button class="btn p-2 fs-10"><span class="fa-solid fa-share"></span></button>
                        <button class="btn p-2 fs-10"><span class="fa-solid fa-face-smile"></span></button>
                      </div>
                    </div>
                    <div class="d-sm-none hover-actions align-self-center me-2 end-0">
                      <div class="bg-body-emphasis rounded-pill d-flex align-items-center border px-2 actions">
                        <button class="btn p-2" type="button"><span class="fa-solid fa-reply text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-trash text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-share text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-face-smile text-primary"></span></button>
                      </div>
                    </div>
                  </div>
                  <p class="mb-0 fs-10 text-body-tertiary text-opacity-85 fw-semibold ms-7">Yesterday, 10 AM</p>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="text-center mt-auto">
            <div class="avatar avatar-3xl status-online">
              <img class="rounded-circle border border-3 border-light-subtle" src="{{ asset('logo/gemini.png') }}" alt="">
            </div>
            <h5 class="mt-2 mb-3">Gemini</h5>
            <p class="text-center text-body-emphasis mb-0">Have questions? Get immediate answers and support from our team!</p>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex align-items-center gap-2 border-top border-translucent ps-3 pe-4 py-3">
        <div class="d-flex align-items-center flex-1 gap-3 border border-translucent rounded-pill px-4">
          <input class="form-control outline-none border-0 flex-1 fs-9 px-0" type="text" placeholder="Message GCare" id="input_message">
          <label class="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" for="supportChatPhotos">
            <span class="fa-solid fa-image"></span>
          </label>
          <input class="d-none" type="file" accept="image/*" id="supportChatPhotos">
          <label class="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" for="supportChatAttachment">
            <span class="fa-solid fa-paperclip"></span>
          </label>
          <input class="d-none" type="file" id="supportChatAttachment">
        </div>
        <button class="btn p-0 border-0 send-btn" onclick="sendMessage()"><span class="fa-solid fa-paper-plane fs-9"></span></button>
      </div>
    </div>
  </div>
  <button class="btn p-0 border border-translucent btn-support-chat">
    <span class="fs-8 btn-text text-primary text-nowrap">GCare</span>
    <span class="fa-solid fa-circle text-success fs-9 ms-2"></span>
    <span class="fa-solid fa-chevron-down text-primary fs-7"></span>
  </button>
</div>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

<script>
  // Ensure user_id and conversation_id are set in localStorage
  const user_id = @json(Auth::id());
  console.log(user_id);
  localStorage.setItem('user_id', user_id);

  let conversation_id = localStorage.getItem('conversation_id');

  // Generate a new conversation_id if it's not already set
  if (!conversation_id) {
    conversation_id = generateConversationId();
    localStorage.setItem('conversation_id', conversation_id);
  }

  /*function generateUserId() {
    // Generate a unique user ID
    return 'user_' + Math.random().toString(36).substring(2, 15);
  }*/

  function generateConversationId() {
    // Generate a unique conversation ID
    return 'conversation_' + Math.random().toString(36).substring(2, 15);
  }

  function sendMessage() {
    const message = document.getElementById('input_message').value;
    if (message.trim() === '') return;

    // Send the message and handle the response
    generateResponse(message);

    // Clear the input field
    document.getElementById('input_message').value = '';
  }

  function newChat(){
    localStorage.removeItem('conversation_id');
    const chatContainer = document.querySelectorAll('.chat .d-flex.flex-column-reverse .d-flex.chat-message');
    for (var i = 0; i < chatContainer.length; i++) {
        chatContainer[i].innerHTML = '';
    }
    hideDefaultText(false);
    //loadConversationMessages(0);
  }
  
</script>
