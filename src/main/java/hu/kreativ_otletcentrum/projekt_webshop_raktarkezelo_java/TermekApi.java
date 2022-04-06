package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

import java.io.IOException;
import java.util.List;

public class TermekApi {
    private static final String BASE_URL = "http://localhost:8000";
    public static final String TERMEK_API_URL = BASE_URL + "/api/termekek";

    public static List<Termek> getTermekek() throws IOException {
        Response response = RequestHandler.get(TERMEK_API_URL);
        String json = response.getContent();

    }
}
