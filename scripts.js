document.addEventListener("DOMContentLoaded", function() {
  let currentSlide = 0;
  const slides = document.querySelectorAll(".slide");

  function showSlide(index) {
     slides.forEach((slide, i) => {
        slide.style.display = i === index ? "block" : "none";
     });
  }

  function nextSlide() {
     currentSlide = (currentSlide + 1) % slides.length;
     showSlide(currentSlide);
  }

  function prevSlide() {
     currentSlide = (currentSlide - 1 + slides.length) % slides.length;
     showSlide(currentSlide);
  }

  // Initial display
  showSlide(currentSlide);

  // Auto slide change (optional)
  setInterval(nextSlide, 3000); // Change slide every 5 seconds (adjust as needed)
});



//for message
function sendMessage() {
   var messageInput = document.getElementById('messageInput');
   var message = messageInput.value.trim();

   if (message !== '') {
       // Assume user_id and restaurant_id are known and set appropriately
       var sender_id = 1; // User ID
       var receiver_id = 2; // Restaurant ID

       // AJAX can be used to send the message to the server
       // For simplicity, we'll use a synchronous XMLHttpRequest here
       var xhr = new XMLHttpRequest();
       xhr.open('POST', 'send_message.php', false);
       xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
       xhr.send('sender_id=' + sender_id + '&receiver_id=' + receiver_id + '&message=' + encodeURIComponent(message));

       // Clear the input field
       messageInput.value = '';

       // Retrieve and display messages after sending
       retrieveMessages();
   }
}

function retrieveMessages() {
   // Assume user_id and restaurant_id are known and set appropriately
   var user_id = 1; // User ID
   var restaurant_id = 2; // Restaurant ID

   // AJAX can be used to retrieve messages from the server
   // For simplicity, we'll use a synchronous XMLHttpRequest here
   var xhr = new XMLHttpRequest();
   xhr.open('GET', 'fuctions/get_messages.php?user_id=' + user_id + '&restaurant_id=' + restaurant_id, false);
   xhr.send();

   // Display messages
   document.getElementById('messages').innerHTML = xhr.responseText;
}

// Initial retrieval of messages when the page loads
retrieveMessages();



navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

function loader(){
   document.querySelector('.loader').style.display = 'none';
}

function fadeOut(){
   setInterval(loader, 2000);
}

window.onload = fadeOut;

document.querySelectorAll('input[type="number"]').forEach(numberInput => {
   numberInput.oninput = () =>{
      if(numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
   };
});