<!DOCTYPE html>
<html>
<head>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script> 

<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  padding: 10px;
  background: #f1f1f1;
}

/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: right;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Inner card */
.innercard {
  margin: auto;
  width: 60%;
}

/* Card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
@media screen and (max-width: 768px) {
  .row {
    width: 100%;
    padding: 0;
  }
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  color: #FFFFFF;
  background: #1b1642;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 768px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 768px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

.header {
  padding: 30px;
  text-align: center;
  background: white;
}

.header a {
  display: block;
  color: #000000;
  text-decoration: none;
}

.header h1 {
  font-size: 50px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #1b1642;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Responsive layout - when the screen is less than 768px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 768px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}

.text-danger {
  color: red;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 7px 10px;
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
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 90%;
}

.secondary{
  color:#fff;
  background-color:#007bff;
  border-color:#007bff
}

.secondary:hover{
  color:#fff;
  background-color:#0069d9;
  border-color:#0062cc
}

.secondary.focus,.secondary:focus{
  box-shadow:0 0 0 .2rem rgba(38,143,255,.5)
}

.primary{
  color:#fff;
  background-color:#6c757d;
  border-color:#6c757d
}

.primary:hover{
  color:#fff;
  background-color:#5a6268;
  border-color:#545b62
}

.primary.focus,.primary:focus{
  box-shadow:0 0 0 .2rem rgba(130,138,145,.5)
}

.success{
  color:#fff;
  background-color:#28a745;
  border-color:#28a745;
  padding: 7px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 43%;
}

.success:hover{
  color:#fff;
  background-color:#218838;
  border-color:#1e7e34
}

.success.focus,.success:focus{
  box-shadow:0 0 0 .2rem rgba(72,180,97,.5)
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

</style>
</head>
<body>

<div class="header">
  <a href="/"><h1>Shorten Link</h1></a>
  <p>A URL shortener using Laravel.</p>
</div>

<div class="topnav">
  @if(session()->has('user_id'))
  <a href="signout" style="float:right">Logout</a>
  <a href="/shortenlink" style="float:right">All URLs</a>

  @else
  <a href="/">Home</a>
  @endif

  <!-- <a href="#" style="float:right">Link</a> -->
</div>