import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)
GPIO.setup(19,GPIO.OUT)

GPIO.output(19, 0)
time.sleep(2)


GPIO.cleanup()
