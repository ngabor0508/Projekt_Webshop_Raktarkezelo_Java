package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok;

import java.util.Date;

public class Felhasznalo {
    private int id;
    private String name;
    private String email;
    private Date created_at;

    public Felhasznalo(int id, String name, String email, Date created_at) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.created_at = created_at;
    }

    public int getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public String getEmail() {
        return email;
    }

    public Date getCreated_at() {
        return created_at;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setCreated_at(Date created_at) {
        this.created_at = created_at;
    }
}
