<?php

// Define the message to be hidden
$message = "Hello, world!";

// Define the path to the cover image
$imagePath = "cover.jpg";

// Define the path to the output image
$outputPath = "output.jpg";

// Open the cover image
$coverImage = imagecreatefromjpeg($imagePath);

// Get the dimensions of the cover image
$width = imagesx($coverImage);
$height = imagesy($coverImage);

// Loop through each pixel in the image
for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {

        // Get the RGB values of the pixel
        $rgb = imagecolorat($coverImage, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        // Get the ASCII code of the current character in the message
        $charCode = ord(substr($message, ($y * $width) + $x, 1));

        // Convert the ASCII code to binary
        $binary = decbin($charCode);

        // Pad the binary value with zeros to ensure it is 8 bits long
        $binary = str_pad($binary, 8, "0", STR_PAD_LEFT);

        // Replace the LSB of each RGB value with the corresponding bit from the binary value
        $r = ($r & 0xFE) | ($binary[0] & 0x01);
        $g = ($g & 0xFE) | ($binary[1] & 0x01);
        $b = ($b & 0xFE) | ($binary[2] & 0x01);

        // Set the new RGB value of the pixel
        $color = imagecolorallocate($coverImage, $r, $g, $b);
        imagesetpixel($coverImage, $x, $y, $color);

    }
}

// Save the modified image to the output path
imagejpeg($coverImage, $outputPath);

// Free up memory by destroying the image resources
imagedestroy($coverImage);
