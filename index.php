<html>
    <head>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://msxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <video id="preview" width="50%"></video>
                </div>
                <div class="col-md-6">
                    <label>SCAN</label>
                    <input type="text" name="text" id="text" readonly="" placeholder="scan qrcode" class="form-control">
					
					<div id="tampil"></div>
                </div>
            </div>
        </div>

        <Script>
            let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
            Instascan.Camera.getCameras().then(function(cameras){
                if(cameras.length > 0 ){
                    scanner.start(cameras[0]);
                } else {
                    alert('No Camera Found');
                }
            }).catch(function(e){
                console.error(e);
            });

            scanner.addListener('scan',function(code){
            document.getElementById('text').value=code;	
			
			/*window.location.href = code;*/
			window.open(code, '_blank');

            });

        </script>
		



    </body>
</html>