<x-header />

<style>
/* Full-width input fields */
input[type=text], input[type=url] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=url]:focus {
  background-color: #ddd;
  outline: none;
}
/* Add padding to container elements */
.container {
  padding: 16px;
}
</style>
<div class="row">
  <div class="column">
    <div class="card">
      <div class="innercard">

        <div class="container">
        <form action="/edit" method="post">
            @csrf
            <h1>Edit URL</h1>
            <p>Please fill in this form to edit.</p>
            <hr>
            <input type="hidden" name="id" value="{{$data['id']}}" />

            <label for="name"><b>Title</b></label> <br>
            <input type="text" name="title" placeholder="Enter title" value="{{$data['title']}}" required /> <br><br>

            <label for="name"><b>Short URL</b></label> <br>
            <input type="text" name="short_url" placeholder="Enter Short URL" value="{{$data['short_url']}}" required minlength="4" maxlength="6" /> <br>
            @if(session('urltaken'))<span class="text-danger">{{session('urltaken')}}</span>@endif <br><br>

            <label for="name"><b>URL</b></label> <br>
            <input type="url" name="url" value="{{$data['url']}}" placeholder="Enter URL (eg: https://shortenlink.com)" required oninvalid="this.setCustomValidity('Please enter a URL. (eg: https://shortenlink.com)')" oninput="this.setCustomValidity('')" /> <br><br>

            <button type="submit">Submit</button>
            
            <span class="text-danger">@error('url'){{$message}}@enderror</span>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<x-footer />
