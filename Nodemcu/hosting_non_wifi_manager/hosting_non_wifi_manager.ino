//library dht
#include "DHT.h"

//include library wifi nodemcu esp8266
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

//pin dht
const int DHTPin = 2; //pin GPIO = D4

//pin relay
const int pin_relay = 5; //pin GPIO = D1
const int pin_relayy = 4; //pin GPIO = D2

//tipe dht
#define DHTTYPE DHT11

//object untuk dht11
DHT dht(DHTPin, DHTTYPE);

//Network SSID
const char* ssid = "TP-Link_Extender";
const char* pass = "1sampai11";

//ambil IP server
const char* host = "kontrolingrumah.000webhostapp.com";

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

  //pin relay
  pinMode(pin_relay, OUTPUT);
  //status set awal
  digitalWrite(pin_relay, LOW);  //High= 1, Low = 0

  //pin relay 2
  pinMode(pin_relayy, OUTPUT);
  //status set awal
  digitalWrite(pin_relayy, LOW);  //High= 1, Low = 0
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
  LinkSensor = "http://" + String(host) + "/kirimdata.php?suhu=" + String(suhu) + "&kelembaban=" + String(kelembaban);
  //eksekusi link url
  httpsensor.begin(LinkSensor);
  httpsensor.GET();
  //tangkap respon kirimdata
  String respon = httpsensor.getString();
  Serial.println(respon);
  delay(1000);

  //baca status relay
  String LinkRelay ;
  HTTPClient httprelay ;
  LinkRelay = "http://" + String(host) + "/bacarelay.php";
  httprelay.begin(LinkRelay);
  //ambil isi status relay
  httprelay.GET();
  //baca status respon relay
  String statusrelay = httprelay.getString();  
  Serial.println(statusrelay);
  httprelay.end();

  //ubah status releay di nodemcu
  digitalWrite(pin_relay, statusrelay.toInt());

  //baca status relay 2
  String LinkRelayy ;
  HTTPClient httprelayy ;
  LinkRelayy = "http://" + String(host) + "/bacarelayy.php";
  httprelayy.begin(LinkRelayy);
  //ambil isi status relay
  httprelayy.GET();
  //baca status respon relay
  String statusrelayy = httprelayy.getString();  
  Serial.println(statusrelayy);
  httprelayy.end();

  //ubah status releay di nodemcu
  digitalWrite(pin_relayy, statusrelayy.toInt());
}
