package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

public class Response {
    int responseCode;
    String content;

    public Response(int responseCode, String content) {
        this.responseCode = responseCode;
        this.content = content;
    }
}
