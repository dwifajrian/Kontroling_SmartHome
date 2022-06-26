//library dht
#include "DHT.h"

//include library wifi nodemcu esp8266
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

//pin dht
const int DHTPin = 2; //bisa diganti dengan pin digital input lain
//tipe dht
#define DHTTYPE DHT11

//object untuk dht11
DHT dht(DHTPin, DHTTYPE);

//Network SSID
const char* ssid = "TP-Link_Extender";
const char* pass = "1sampai11";

//ambil IP server
const char* host = "192.168.1.10";

void setup() {
  Serial.begin(9600);
  dht.begin();
  
  //koneksi ke host
  WiFi.hostname("NodeMcu");
  //koneksi ke wifi
  WiFi.begin(ssid, pass);

  //cek koneksi berhasil atau tidak
  while(WiFi.status() !=WL_CONNECTED)
  {
    //coba koneksi terus
    Serial.print(".");
    delay(500);
  }
  //apabila terkoneksi
  Serial.print("Berhasil Konek ke Wifi");
}

void loop() {
 // baca nilai suhu
  float suhu = dht.readTemperature();
  //baca nilai kelembaban
  int kelembaban = dht.readHumidity();

  //tampilkan di serial monitor
  Serial.println("Suhu :" + String(suhu));
  Serial.println("Kelembaban:"+ String(kelembaban));
  Serial.println();

  //kirim data ke databases
  //cek koneksi nodemcu ke web server
  WiFiClient client;
  const int httpPort = 80;
  //uji koneksi
  if(!client.connect(host, httpPort))
  {
    Serial.println("Gagal Koneksi ke Server");
    return;
  }

  // apabila terkoneksi ke web server,maka kirim data
  String LinkSensor;
  HTTPClient httpsensor;
  //siapkan variable link URL untuk kirim data
  LinkSensor = "http://" + String(host) + "/controlling/kirimdata.php?suhu=" + String(suhu) + "&kelembaban=" + String(kelembaban);
  //eksekusi link url
  httpsensor.begin(LinkSensor);
  httpsensor.GET();
  //tangkap respon kirimdata
  String respon = httpsensor.getString();
  Serial.println(respon);
  delay(1000);
}
