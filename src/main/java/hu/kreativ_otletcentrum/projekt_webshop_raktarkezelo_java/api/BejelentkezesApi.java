package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.api;

import com.google.gson.Gson;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.*;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Bejelentkezes;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Felhasznalo;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Response;
import hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java.peldanyok.Token;

import java.io.IOException;

public class BejelentkezesApi {
    public static Gson jsonConverter = new Gson();
    public static String URL = "http://localhost:8000/api";

    public static String getBejelentkezes(String url, String token) throws IOException {
        Response response = RequestHandler.tokenAuthorization(url, token);
        String json = response.getContent();

        if (response.getResponseCode() >= 400){
            String message = jsonConverter.fromJson(json, ApiError.class).getMessage();
            throw new IOException(message);
        }
        return json;
    }

    public static Token postBejelentkezes(Bejelentkezes bejelentkezes) throws IOException {
        String bejelentkezesJson = jsonConverter.toJson(bejelentkezes);

        Response response = RequestHandler.post(URL + "/login", bejelentkezesJson);
        String json = response.getContent();

        if (response.getResponseCode() >= 400){
            String message = jsonConverter.fromJson(json, ApiError.class).getMessage();
            throw new IOException(message);
        }
        return jsonConverter.fromJson(json, Token.class);
    }

    public static Felhasznalo getBejelentkezesAdatok(String token) throws IOException {
        String json = getBejelentkezes(URL + "/user", token);
        return jsonConverter.fromJson(json, Felhasznalo.class);
    }
}
