<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Drag & Drop multiple images uploading using Pure JavaScript</title>
	<link rel="stylesheet" type="text/css" href="app.css">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../fontawesome-library/css/all.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600&display=swap');

*,::after,::before {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    min-height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 14px;
    font-family: 'Mulish', sans-serif;
    background: #dfe3f2;
}

/* MAIN STYLE */

.card {
    width: 400px;
    height: auto;
    padding: 15px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    border-radius: 5px;
    overflow: hidden;
    background: #fafbff;
}

.card .top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.card p {
    font-size: 0.9rem;
    font-weight: 600;
    color: #878a9a;
}

.card button {
    outline: 0;
    border: 0;
        -webkit-appearence: none;
	background: #5256ad;
	color: #fff;
	border-radius: 4px;
	transition: 0.3s;
	cursor: pointer;
	font-weight: 400;
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
	font-size: 0.8rem;
	padding: 8px 13px;
}

.card button:hover {
	opacity: 0.8;
}

.card button:active {
	transform: translateY(5px);
}

.card .drag-area {
	width: 100%;
	height: 160px;
	border-radius: 5px;
	border: 2px dashed #d5d5e1;
	color: #c8c9dd;
	font-size: 0.9rem;
	font-weight: 500;
	position: relative;
	background: #dfe3f259;
	display: flex;
	justify-content: center;
	align-items: center;
	user-select: none;
	-webkit-user-select: none;
	margin-top: 10px;
}

.card .drag-area .visible {
	font-size: 15px;
  text-align: center;
}
.card .select {
    color: #5256ad;
	margin-left: 5px;
	cursor: pointer;
	transition: 0.4s;
}

.card .select:hover {
	opacity: 0.6;
}

.card .container {
	width: 100%;
	height: auto;
	display: flex;
	justify-content: flex-start;
	align-items: flex-start;
	flex-wrap: wrap;
	max-height: 200px;
	overflow-y: auto;
	margin-top: 10px;
}

.card .container .image {
	width: calc(26% - 19px);
	margin-right: 15px;
	height: 75px;
	position: relative;
	margin-bottom: 8px;
}

.card .container .image img {
	width: 100%;
	height: 100%;
	border-radius: 5px;
}

.card .container .image span {
	position: absolute;
	top: -2px;
	right: 9px;
	font-size: 20px;
	cursor: pointer;
}

/* dragover class will used in drag and drop system */
.card .drag-area.dragover {
	background: rgba(0, 0, 0, 0.4);
}

.card .drag-area.dragover .on-drop {
	display: inline;
	font-size: 28px;
}

.card input,
.card .drag-area .on-drop, 
.card .drag-area.dragover .visible {
	display: none;
}
  </style>
</head>
<body>

    <div class="card">
    	<div class="top">
    		<p>Drag & drop image uploading</p>
    		<button type="button">Upload</button>
    	</div>
    	<div class="drag-area">
    		<span class="visible">
          <i class="fas fa-image" style="font-size: 25px;"></i><br>
				DRAG AND DROP A PHOTO <br> OR <br>
				<span class="select" role="button">Browse</span>
			</span>
			<span class="on-drop">Drop images here</span>
    		<input name="file" type="file" class="file" multiple />
    	</div>

	    <!-- IMAGE PREVIEW CONTAINER -->
    	<div class="container"></div>
    </div>

    <script src="js/file_chooser.js"></script>
</body>
</html>