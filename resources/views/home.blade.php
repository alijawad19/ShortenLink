<x-header />

<style>

/* Full-width input fields */
input[type=text], input[type=email], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=email]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto;
  border: 1px solid #888;
  width: 80%;
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

ul li {
  border: 1px solid #ddd;
  margin-top: -1px;
  background-color: #ff9999;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block;
  position: relative;
}

ul li:hover {
  background-color: #ff8888;
}

ol {
  list-style-type: none;
  background: #3399ff;
  padding: 20px;
}

ol li {
  padding: 5px;
  margin-left: 35px;
}

.closeCard {
  position: absolute;
  right: 0%;
  top: 0%;
  font-size: 30px;
  font-weight: bold;
  color: #f1f1f1;
}

.closeCard:hover,
.closeCard:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

/* Style the counter cards */
.innercolumn {
  width: 35%;
  margin: auto;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #444;
  color: white;
}

#tick-mark {
    font-size: 50px;
    position: relative;
    display: inline-block;
    width: 30px;
    height: 30px;
}

#tick-mark::before {
    position: absolute;
    left: 0;
    top: 50%;
    height: 50%;
    width: 3px;
    background-color: green;
    content: "";
    transform: translateX(10px) rotate(-45deg);
    transform-origin: left bottom;
}

#tick-mark::after {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 100%;
    background-color: green;
    content: "";
    transform: translateX(10px) rotate(-45deg);
    transform-origin: left bottom;
}

.alert {
  width: 100%;
}

</style>

<div class="row">
  <div class="leftcolumn">
    <div class="card" style="display: flex;">
      <div class="innercard">
          <div class="innercolumn">
            <p><i id="tick-mark"></i></p>
            <h3>{{session('count')}}</h3>
            <p>URLs shortened</p>
          </div>
      </div>
      <div class="innercard">

            @if ($errors->has('name'))
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <span>{{ $errors->first('name') }}</span>
            </div>
            @endif
            @if ($errors->has('email'))
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <span>{{ $errors->first('email') }}</span>
            </div>
            @endif
            @if ($errors->has('password'))
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <span>{{ $errors->first('password') }}</span>
            </div>
            @endif

        <ol>
        <h2>Features</h2>
          <li>Sign up and sign in using Auth.</li>
          <li>Table migration.</li>
          <li>List of all shortened URLs with a form on top to shorten new URL.</li>
          <li>Shorten new URL and update list without page refresh (Ajax).</li>
          <li>Copy to clipboard button to copy short URL.</li>
          <li>Edit and customize shortened URL.</li>
          <li>Middleware to verify authenticated user.</li>
        </ol>

        <div id="id01" class="modal">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <form class="modal-content" action="{{ route('register.custom') }}" method="POST">
          @csrf
            <div class="container">
              <h1>Sign Up</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>
              <label for="name"><b>Name</b></label>
              <input type="text" placeholder="Enter Name" name="name" required>
              
              <label for="email"><b>Email</b></label>
              <input type="email" placeholder="Enter Email" name="email" required>

              <label for="password"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" required>

              <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <div class="innercard">
      
      <h2>Sign in to your account</h2>
        <form action="{{ route('login.custom') }}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Enter your email" required />
            <input type="password" name="password" placeholder="Enter your password" required />
            @if(session('invalid'))<span class="text-danger">{{session('invalid')}}</span>@endif

            <button type="submit">Sign In</button>
        </form>

        <hr><h4 style="text-align:center">OR</h4>

        <div class="clearfix">
          <button onclick="document.getElementById('id01').style.display='block'" style="  background-color: #f44336;">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var closebtns = document.getElementsByClassName("closeCard");
var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}

</script>

<x-footer />