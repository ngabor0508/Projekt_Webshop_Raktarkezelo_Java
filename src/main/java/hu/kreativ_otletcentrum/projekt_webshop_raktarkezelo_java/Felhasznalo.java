package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

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


}
