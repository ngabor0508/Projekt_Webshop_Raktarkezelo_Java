package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

public class Termek {
    private Integer id;
    private String kodszam;
    private String name;
    private Integer price;
    private Integer quantity;
    private String url;
    private String kategoria;

    public Termek(Integer id, String kodszam, String name, Integer price, Integer quantity, String url, String kategoria) {
        this.id = id;
        this.kodszam = kodszam;
        this.name = name;
        this.price = price;
        this.quantity = quantity;
        this.url = url;
        this.kategoria = kategoria;
    }

    public Integer getId() {
        return id;
    }

    public String getKodszam() {
        return kodszam;
    }

    public String getName() {
        return name;
    }

    public Integer getPrice() {
        return price;
    }

    public Integer getQuantity() {
        return quantity;
    }

    public String getUrl() {
        return url;
    }

    public String getKategoria() {
        return kategoria;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public void setKodszam(String kodszam) {
        this.kodszam = kodszam;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setPrice(Integer price) {
        this.price = price;
    }

    public void setQuantity(Integer quantity) {
        this.quantity = quantity;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    public void setKategoria(String kategoria) {
        this.kategoria = kategoria;
    }
}
