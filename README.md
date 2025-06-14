## Goal

To set up a web interface to read data from SenseHat on Raspberry PI and control LED matrix.
The reading of sensors is done with I2C, and the reading from and writing to the LED matrix is done with the built-in functions of the Python library

## Progress
- [x] Write Python to communicate with SenseHat
- [x] Write PHP that will execute Python file with arguments input by user
- [x] Write PHP that will directly communicate via I2C with SenseHat
- [x] Make HTML/CSS dynamic interface for the user (jQuery)
- [x] Use I2C for reading sensors
- [x] Keep sensor reading response <200 ms
