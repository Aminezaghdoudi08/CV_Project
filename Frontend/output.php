<!DOCTYPE html>

<?php include "head.php"; ?>

<body class="container">
	<?php include "header.php"; ?>


	<main>
		<div class="centered content-body">
			<div>
				<br>
				<label for="picture">Foto</label><br>
				<!-- src="profile_picture_Bill_Gates.png" -->
				<img style="
					width: 180px;
					height: 180px;
					border: 1px solid #DFE4E6;
					border-bottom-color: #cdd0d2;
					border-right-color: #cdd0d2;
					box-shadow: 2px 2px 2px rgba(0,0,0,.5);"
					src="profile_placeholder.png"
					id="ProfilePicture"
					onclick="document.getElementById('image_picker').click();">
				<!-- <br> -->
				<input type="file" id="image_picker" style="display: none" onchange="updateImage()">
				<!-- <button class="inline" style="height: 2em;" onclick="updateImage()">Upload</button> -->
				<br><br>
				<label>Name</label><br>
				<input 
					type="text" 
					id="FirstName">
				<input 
					type="text" 
					id="LastName">
				<br><br>
				<label>Standort</label><br>
				<input 
					type="text" 
					id="Location">
				<br><br>
				<label>Firma & Position</label><br>
				<div class="input-list-container" id="Experiences">
					<div>
						<div>Position</div>
						<div>Firma</div>
						<div>Beschreibung</div>
						<div></div>
					</div>
					<div class="input-list-element" id="Experiences_0">
						<!-- oninput="InputList.update('Experiences')" -->
						<div>
							<input
								type="text"
								name="JobTitle">
						</div>
						<div>
							<input
								type="text"
								name="CompanyName">
						</div>
						<div>
							<input
								type="text"
								name="Description">
						</div>
						<div>
							<button
								onclick="InputList.remove('Experiences','Experiences_0')"
								class="inline"
								tabindex="-1">X</button>
						</div>
					</div>
				</div>
				<button
					onclick="InputList.append('Experiences')"
					class="inline" style="margin: 0.3em;">+</button>
				<br><br>
				<label>Ausbildung</label><br>
				<div class="input-list-container" id="Educations">
					<div>
						<div>Universität</div>
						<div>Feld</div>
						<div></div>
					</div>
					<div class="input-list-element" id="Educations_0">
						<div>
							<input
								type="text"
								name="School">
						</div>
						<div>
							<input
								type="text"
								name="FieldOfStudy">
						</div>
						<div>
							<button
								onclick="InputList.remove('Educations','Educations_0')"
								class="inline"
								tabindex="-1">X</button>
						</div>
					</div>
				</div>
				<button
					onclick="InputList.append('Educations')"
					class="inline" style="margin: 0.3em;">+</button>
				<br><br>
				<label>Zusammenfassung</label><br>
				<!-- <input
					id="Summary"> -->
				<textarea
					style="font-family: Arial, Helvetica, sans-serif"
					wrap="soft"
					rows="3"
					cols="60"	 
					id="Summary"></textarea>
				<br><br>
				<label>Skills</label><br>
				<div class="input-list-container" id=Skills>
					<div id="Skills_0" class="input-list-element">
						<div>
							<input
								type="text">
						</div>
						<div>	
							<button
								onclick="InputList.remove('Skills','Skills_0')"
								class="inline"
								tabindex="-1">X</button>
						</div>
					</div>
				</div>
				<button
					onclick="InputList.append('Skills')"
					class="inline" style="margin: 0.3em;">+</button>
				<br><br>
				<label>Languages</label><br>
				<div class="input-list-container" id="Languages">
					<div id="Languages_0" class="input-list-element">
						<div>
							<input
								type="text">
						</div>
						<div>	
							<button
								onclick="InputList.remove('Languages','Languages_0')"
								class="inline"
								tabindex="-1">X</button>
						</div>
					</div>
				</div>
				<button
					onclick="InputList.append('Languages')"
					class="inline" style="margin: 0.3em;">+</button>
				<br><br>
			</div>

			<div class="horizontal-center"> 
				<button 
					onclick="submit()"
					>
					Submit
				</button>
				<button 
					onclick="back()"
					>
					Back
				</button>
				<button 
					onclick="showHelp()"
					>
					Help
				</button><br>
			</div>
		</div>
	</main>

	<?php include "footer.php"; ?>
</body>

<script type="text/javascript" src="Bill_Gates.js"></script>
<script type="text/javascript" src="Nadin_Zaya.js"></script>
<script type="text/javascript" src="output.js"></script>
</html>