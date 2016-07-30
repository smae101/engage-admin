<<!DOCTYPE html>
<html>
<head>
	<title>
		Sample Pdf Viewer
	</title>
	<script type='text/javascript'>

	  function embedPDF(){

	    var myPDF = new PDFObject({ 

	      url: '../../assets/pdf/1117955fb6e40239a0.pdf',
	      pdfOpenParams: { toolbar: '0', statusbar: '0', messages: '0', navpanes: '0' }

	    }).embed();  

	  }

	  window.onload = embedPDF; //Feel free to replace window.onload if needed.

	</script>
</head>
<body>

</body>
</html>
<!-- <object data='<?php echo base_url("assets/pdf");?>/1117955fb6e40239a0.pdf#toolbar=0&statusbar=0&messages=0&navpanes=0' 
        type='application/pdf' 
        width='100%' 
        height='100%'>

<p>It appears your Web browser is not configured to display PDF files. 
No worries, just <a href='assets/pdf/1117955fb6e40239a0.pdf'>click here to download the PDF file.</a></p>

</object> -->
<!-- <iframe src="<?php echo base_url("assets/pdf/1117955fb6e40239a0.pdf#toolbar=0&navpanes=0");?>" width="100%" height="1000"></iframe> -->