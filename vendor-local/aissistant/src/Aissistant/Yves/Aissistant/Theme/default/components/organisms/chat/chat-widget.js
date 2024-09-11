(function() {

    // Inject the CSS
    const style = document.createElement('style');
    style.innerHTML = `
    /* PROOF OF CONCEPT, using chat-widget by  anantrp available at https://github.com/anantrp/chat-widget/tree/main, translated to plain CSS by the gipity */
  #chat-widget-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    flex-direction: column;
  }
  #chat-popup {
    height: 70vh;
    max-height: 70vh;
    transition: all 0.3s;
    overflow: hidden;
  }
  @media (max-width: 768px) {
    #chat-popup {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      max-height: 100%;
      border-radius: 0;
    }
  }
    /* General styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Chat Bubble */
    #chat-bubble {
      width: 4rem;
      height: 4rem;
      background-color: #2d3748; /* Tailwind bg-gray-800 */
      border-radius: 9999px; /* Tailwind rounded-full */
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 1.875rem; /* Tailwind text-3xl */
    }

    #chat-bubble svg {
      width: 2.5rem; /* Tailwind w-10 */
      height: 2.5rem; /* Tailwind h-10 */
      color: #ffffff; /* Tailwind text-white */
    }

    /* Chat Popup */
    #chat-popup {
      position: absolute;
      bottom: 5rem; /* Tailwind bottom-20 */
      right: 0;
      width: 24rem; /* Tailwind w-96 */
      background-color: white;
      border-radius: 0.375rem; /* Tailwind rounded-md */
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Tailwind shadow-md */
      display: flex;
      flex-direction: column;
      font-size: 0.875rem; /* Tailwind text-sm */
      transition: all 0.3s ease;
    }

    /* Chat Header */
    #chat-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem; /* Tailwind p-4 */
      background-color: #2d3748; /* Tailwind bg-gray-800 */
      color: white; /* Tailwind text-white */
      border-top-left-radius: 0.375rem; /* Tailwind rounded-t-md */
      border-top-right-radius: 0.375rem; /* Tailwind rounded-t-md */
    }

    #chat-header h3 {
      margin: 0;
      font-size: 1.125rem; /* Tailwind text-lg */
    }

    #close-popup {
      background-color: transparent;
      border: none;
      color: white;
      cursor: pointer;
    }

    #close-popup svg {
      width: 1.5rem; /* Tailwind w-6 */
      height: 1.5rem; /* Tailwind h-6 */
    }

    /* Chat Messages */
    #chat-messages {
      flex: 1;
      padding: 1rem; /* Tailwind p-4 */
      overflow-y: auto;
    }

    /* Chat Input */
    #chat-input-container {
      padding: 1rem; /* Tailwind p-4 */
      border-top: 1px solid #e5e7eb; /* Tailwind border-t border-gray-200 */
    }

    #chat-input-container .flex {
      display: flex;
      align-items: center;
      gap: 1rem; /* Tailwind space-x-4 */
    }

    #chat-input {
      flex: 1;
      border: 1px solid #d1d5db; /* Tailwind border border-gray-300 */
      border-radius: 0.375rem; /* Tailwind rounded-md */
      padding: 0.5rem 1rem; /* Tailwind px-4 py-2 */
      outline: none;
      width: 75%; /* Tailwind w-3/4 */
    }

    #chat-submit {
      background-color: #2d3748; /* Tailwind bg-gray-800 */
      color: white;
      border-radius: 0.375rem; /* Tailwind rounded-md */
      padding: 0.5rem 1rem; /* Tailwind px-4 py-2 */
      cursor: pointer;
    }

    .reply-message a {
      color: #5a67d8; /* Tailwind text-indigo-600 */
    }

    #spinner {
        display: none;
    }

    #chat-input-container a {
      color: #5a67d8; /* Tailwind text-indigo-600 */
    }
    .user-message{
    background-color: #2d3748; /* bg-gray-800 */
color: #ffffff; /* text-white */
border-radius: 0.5rem; /* rounded-lg */
padding-top: 0.5rem; /* py-2 */
padding-bottom: 0.5rem; /* py-2 */
padding-left: 1rem; /* px-4 */
padding-right: 1rem; /* px-4 */
max-width: 70%; /* max-w-[70%] */
    }
    .reply-message{
    background-color: #edf2f7; /* bg-gray-200 */
color: #000000; /* text-black */
border-radius: 0.5rem; /* rounded-lg */
padding-top: 0.5rem; /* py-2 */
padding-bottom: 0.5rem; /* py-2 */
padding-left: 1rem; /* px-4 */
padding-right: 1rem; /* px-4 */
max-width: 70%; /* max-w-[70%] */
    }
    .message-element{
    display: flex; /* flex */
justify-content: flex-end; /* justify-end */
margin-bottom: 0.75rem; /* mb-3 */
}
.reply-element{
display: flex; /* flex */
margin-bottom: 0.75rem; /* mb-3 */
}
  .hidden, #chat-popup.hidden {
    display: none;
  }
  `;

    document.head.appendChild(style);

    // Create chat widget container
    const chatWidgetContainer = document.createElement('div');
    chatWidgetContainer.id = 'chat-widget-container';
    document.body.appendChild(chatWidgetContainer);

    // Inject the HTML
    chatWidgetContainer.innerHTML = `
  <div id="chat-bubble">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
    </svg>
  </div>

  <div id="chat-popup" class="hidden">
    <div id="chat-header">
      <h3>Aissistant</h3>
      <button id="close-popup">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div id="chat-messages"></div>
    <div id="chat-input-container">
      <div class="flex">
        <input type="text" id="chat-input" placeholder="Type your message...">
        <button id="chat-submit">Send</button>
      </div>
    </div>
  </div>
  `;

    // Add event listeners
    const chatInput = document.getElementById('chat-input');
    const chatSubmit = document.getElementById('chat-submit');
    const chatMessages = document.getElementById('chat-messages');
    const chatBubble = document.getElementById('chat-bubble');
    const chatPopup = document.getElementById('chat-popup');
    const closePopup = document.getElementById('close-popup');

    chatSubmit.addEventListener('click', function() {

        const message = chatInput.value.trim();
        if (!message) return;

        chatMessages.scrollTop = chatMessages.scrollHeight;

        chatInput.value = '';

        onUserRequest(message);

    });

    chatInput.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            chatSubmit.click();
        }
    });

    chatBubble.addEventListener('click', function() {
        togglePopup();
    });

    closePopup.addEventListener('click', function() {
        togglePopup();
    });

    function togglePopup() {
        const chatPopup = document.getElementById('chat-popup');
        chatPopup.classList.toggle('hidden');
        if (!chatPopup.classList.contains('hidden')) {
            document.getElementById('chat-input').focus();
        }
    }

    function onUserRequest(message) {
        // Handle user request here
        console.log('User request:', message);

        // Display user message
        const messageElement = document.createElement('div');
        messageElement.className = 'message-element';
        messageElement.innerHTML = `
      <div class="user-message">
        ${message}
      </div>
    `;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        chatInput.value = '';

        const request = new Request("/aissistant?message="+message, {
            method: "GET",
        });



        fetch(request)
            .then(async (response) => {
                if (response.status === 200) {
                    reply(await response.json());
                } else {
                    reply("Something went wrong on API server!");
                }
            })
            .then((response) => {
                console.debug(response);
            })
            .catch((error) => {
                console.error(error);
            });
        // Reply to the user
        // setTimeout(function() {
        //     reply('Hello! This is a sample reply.');
        // }, 1000);
    }

    function reply(message) {
        const chatMessages = document.getElementById('chat-messages');
        const replyElement = document.createElement('div');
        replyElement.className = 'reply-element';
        replyElement.innerHTML = `
      <div class="reply-message">
        ${message}
      </div>
    `;
        chatMessages.appendChild(replyElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

})();
