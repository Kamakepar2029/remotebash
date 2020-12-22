<!doctype html>
  <html>
    <head>
      <link rel="stylesheet" href="/xterm.css" />
      <script src="/xterm/lib/xterm.js"></script>
      <meta name="viewport" content="width=device-width">
    </head>
    <body>
    <style>
    body{
      background:black;
    }
    </style>
      <div id="terminal"></div>
      <script>
        const term = new Terminal();
    const socket = new WebSocket('ws://term.kamakepar.repl.co:80/term');
        term.open(document.getElementById('terminal'));
        term.onData(function(data){
        console.log(data)
        socket.send(data)
    })

    socket.addEventListener('message', function (event) {
        console.log('>', event)
        term.write(event.data);
    });
      </script>
    </body>
  </html>