<?php
// Include the FPDF library
require('fpdf//fpdf.php');

// Create a new PDF instance
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Add title to the PDF
$pdf->Cell(0, 10, 'Medical Prescription', 0, 1, 'C');
$pdf->Ln(10); // Line break

// Set font for the content
$pdf->SetFont('Arial', '', 12);

// Add content to the PDF
$pdf->Cell(0, 10, 'Date: 2025-01-10', 0, 1);
$pdf->Cell(0, 10, 'Prescribed by: Dr. Sarah Ahmed', 0, 1);
$pdf->Ln(10); // Line break

$pdf->Cell(0, 10, 'Medications:', 0, 1);
$pdf->Ln(5); // Small line break

$pdf->Cell(0, 10, '1. Paracetamol 500mg - Twice daily after meals', 0, 1);
$pdf->Cell(0, 10, '2. Amoxicillin 250mg - Three times daily for 7 days', 0, 1);
$pdf->Cell(0, 10, '3. Vitamin C 500mg - Once daily', 0, 1);

$pdf->Ln(10); // Line break
$pdf->Cell(0, 10, 'Additional Notes:', 0, 1);
$pdf->MultiCell(0, 10, 'Drink plenty of water and rest.');

// Output the PDF (force download)
$pdf->Output('D', 'Prescription.pdf');
?>
