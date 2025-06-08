import serial
import argparse
from time import sleep


parser=argparse.ArgumentParser(prog='serialProgram')
parser.add_argument('-d', help='Text as LEDx=A, where <0-A-9> and x=1|2')
args=parser.parse_args()

if args.d:

	mySerial= serial.Serial('COM3', 115200, timeout=1, parity=serial.PARITY_NONE)

	sleep(0.1)
	mySerial.reset_input_buffer()
	n = mySerial.write(bytes(args.d,'ascii'))
	text=mySerial.read_until(expected=bytes('\n','ascii'))
	print(text)

	sleep(0.5)
mySerial.close()