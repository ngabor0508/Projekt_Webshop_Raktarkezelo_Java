package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok;

import java.util.Date;

public class Felhasznalo {
    private int id;
    private String name;
    private String email;
    private boolean permission;
    private Date created_at;

    public Felhasznalo(int id, String name, String email, boolean permission, Date created_at) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.permission = permission;
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

    public boolean getPermission() {
        return permission;
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

    public void setPermission(boolean permission) {
        this.permission = permission;
    }

    public void setCreated_at(Date created_at) {
        this.created_at = created_at;
    }
}
