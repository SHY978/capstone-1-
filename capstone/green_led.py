from gpiozero import LED
from time import sleep

green_led = LED(18)

green_led.on()
sleep(5)
green_led.off()
