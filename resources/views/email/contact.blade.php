<!doctype html>
<title>{{$data['subject']}}</title>
<style>
  body { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  body { font: 20px Helvetica, sans-serif; color: #333; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
</style>

<article>
    <h1>{{$data['subject']}}</h1>
    <p>{{$data['first_name']}} {{$data['last_name']}} </p>
    <p>{{$data['email']}}</p>
    <div>
        <p>{{$data['text']}}</p>
    </div>
    <div>
        <br>
        <p>OLA!</p>
        <br>
        <i>https://olauniverse.com</i>
    </div>
</article>