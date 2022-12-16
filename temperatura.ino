
#include "DHT.h"
#include <Adafruit_Sensor.h>
#include "HX711.h"

const int LOADCELL_DOUT_PIN = A4;
const int LOADCELL_SCK_PIN = A5;

HX711 hx711;

const int dht_pin = 3;
const int dht_tipo = DHT11;


float dht_humedad;
float dht_temperatura;

DHT dht(dht_pin, dht_tipo);

const int sensorPin = 2;
const int measureInterval = 2500;
volatile int pulseConter;
const float factorK = 7.5;

float volume = 0;
long t0 = 0;
void ISRCountPulse()
{
   pulseConter++;
}
float GetFrequency()
{
   pulseConter = 0;
   interrupts();
   delay(measureInterval);
   noInterrupts();
   return (float)pulseConter * 1000 / measureInterval;
}
void SumVolume(float dV)
{
   volume += dV / 60 * (millis() - t0) / 1000.0;
   t0 = millis();
}

void setup() {
 
  Serial.begin(9600);
  hx711.begin(LOADCELL_DOUT_PIN, LOADCELL_SCK_PIN);
  dht.begin();
  delay(2000);
  attachInterrupt(digitalPinToInterrupt(sensorPin), ISRCountPulse, RISING);
  t0 = millis();
  
  // Lee los valores de humedad y temperatura
  float dht_humedad = dht.readHumidity(); 
  float dht_temperatura = dht.readTemperature();

  // Envia las lecturas al monitor serial
  Serial.print("Humedad: ");
  Serial.print(dht_humedad);
  Serial.println(" %");
  Serial.print("Temperatura: ");
  Serial.print(dht_temperatura);
  Serial.println(" grados Celsius");
  if (hx711.is_ready()) {
        // Paso 6
        long reading = hx711.read();
        Serial.print("HX711 reading: ");
        Serial.println(reading);
    } else {
        Serial.println("HX711 not found.");
    }
  delay(1000);
  
  
}
void loop() {
  // obtener frecuencia en Hz
   float frequency = GetFrequency();
   // calcular caudal L/min
   float flow_Lmin = frequency / factorK;
   SumVolume(flow_Lmin);
   Serial.print(" Caudal: ");
   Serial.print(flow_Lmin, 3);
   Serial.print(" (L/min)\tConsumo:");
   Serial.print(volume, 1);
   Serial.println(" (L)");
   

   }
   

