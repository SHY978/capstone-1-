from gpiozero import LED
from time import sleep

red_led = LED(24)

red_led.on()
sleep(5)
red_led.off()

