# Steganography Reverse Shell By ClumsyLulz
This PHP code is an example of how to hide a message within an image using the Least Significant Bit (LSB) technique. The code takes an input message "Hello, world!", a cover image "cover.jpg", and an output path "output.jpg" as parameters. It then opens the cover image and gets its dimensions. It loops through each pixel in the cover image and extracts the RGB values of the pixel. It also retrieves the ASCII code of the current character in the message and converts it to binary, padding it with zeros to ensure it is 8 bits long. The code then replaces the least significant bit (LSB) of each RGB value with the corresponding bit from the binary value of the message. After modifying the RGB values of all pixels in the cover image, it saves the modified image to the output path using imagejpeg() function, and frees up memory by destroying the image resources using imagedestroy() function. The resulting image "output.jpg" will visually look similar to the original cover image, but it will contain the hidden message encoded within the LSB of the RGB values.
