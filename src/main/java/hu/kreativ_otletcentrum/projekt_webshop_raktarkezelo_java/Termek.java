package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

public class Termek {
    private int id;
    private String kodszam;
    private String name;
    private int price;
    private int quantity;
    private String url;
    private String kategoria;

    public Termek(int id, String kodszam, String name, int price, int quantity, String url, String kategoria) {
        this.id = id;
        this.kodszam = kodszam;
        this.name = name;
        this.price = price;
        this.quantity = quantity;
        this.url = url;
        this.kategoria = kategoria;
    }

}
