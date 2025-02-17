<?php
// Path to your PDF file
$pdf_file = './CV - PENG.pdf'; // Update the path if needed

// Check if the file exists
if (file_exists($pdf_file)) {
    // Serve the PDF file
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="CV - PENG.pdf"');
    readfile($pdf_file);
    exit;
} else {
    // If the file doesn't exist, display an error message
    echo "The CV file does not exist.";
}
?>
