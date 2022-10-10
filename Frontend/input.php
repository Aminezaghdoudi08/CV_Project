<!DOCTYPE html>
<!--
Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
-->

<!-- <div class="overlay" id="overlay">
	<h3>Please copy your CV</h3><br>
	<h3>Your clipboard is empty</h3>
</div> -->

<?php include "head.php"; ?>

<body class="container">
	<?php include "header.php"; ?>


	<main>
		<!-- <div class="message"></div> -->
		<!-- onmouseover="clear_editor()" -->
		<div class="centered content-body">
			<div>
				<textarea id="editor" name="editor"></textarea>

			</div>
			<!-- <div id="editor" name="editor">
				<p>Paste your copied CV here</p>
				<p>and click parse</p>
			</div> -->

			<br>

			<div class="horizontal-center"> 
				<button
					onclick="parse()">
					Parse
				</button>
				<button 
					id="helpButton"
					onclick="showHelp()"
					>
					Help
					<div id="helpOverlay" style="display: none;"> 
						<div id="helpNavigationBar" class="helpNavigationBar">
							<img src="./nav_left.png"  id="helpOverlayLeft"  height="20em"></img>
							<img src="./nav_right.png" id="helpOverlayRight" height="20em"></img>
							<img src="./nav_exit.png"  id="helpOverlayExit"  height="20em" onclick="hideHelp()"></img>
						</div>
						<div id="helpOverlayText">Step 1:<br> Copy your LinkedIn-CV. <br> Your clipboard is currently empty.</div>
					</div>
				</button>
			</div>
		</div>	
	</main>

	<?php include "footer.php"; ?>

	<script src="./ckeditor/ckeditor.js"></script>
</body>


<script>
	var queryDict = {}
	location.search.substr(1).split("&").forEach(function(item) {queryDict[item.split("=")[0]] = item.split("=")[1]})
	if ("key" in queryDict) {
		sessionKey = queryDict["key"];
	}
	else {
		sessionKey = "no_key";
		console.log("invalid or no session key") //do some more stuff
	}
	sessionStorage.setItem("sessionKey",sessionKey); //maby we can also fo without?
	console.log(sessionKey);



	editor = CKEDITOR.replace('editor', {
      	height: 500,
		//   toolbar: false,
	  	allowedContent: true,
	  	extraAllowedContent: true,
		// removePlugins: 'toolbar, pastefromword, tableselection, uploadwidget, clipboard, pastetext, widget, uploadimage',
	//   removePlugins = 'resize'
    });

	function parseInBackend(data) {
		//send data to backend and wait for response while showing logo
		return {
			name: "max musterman",
			location: "hannover",
			skills: ["hello", "world"],
		}
	}

	function parse(){
		// window.location.href = "./mock_up_output.html";
		console.log(CKEDITOR.instances.editor.getData());
		var parsedData = parseInBackend(CKEDITOR.instances.editor.getData())
		console.log(parsedData);
		sessionStorage.setItem("parsedData",JSON.stringify(parsedData));
		window.location.href = "./output.php"+"?key="+sessionKey;
	}

	function showHelp(){
		let help = document.getElementById("helpOverlay");
		let helpNavBar = document.getElementById("helpNavigationBar");
		help.style.display = "block";
		helpNavBar = "flex";
	}

	function hideHelp() {
		let help = document.getElementById("helpOverlay");
		let helpNavBar = document.getElementById("helpNavigationBar");
		help.style.display = "none";
		helpNavBar = "none";
		console.log("should be closed");
	}

</script>
</html>
