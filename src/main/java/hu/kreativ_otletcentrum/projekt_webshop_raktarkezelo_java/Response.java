package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

public class Response {
    int responseCode;
    String content;

    public Response(int responseCode, String content) {
        this.responseCode = responseCode;
        this.content = content;
    }

    public int getResponseCode() {
        return responseCode;
    }

    public String getContent() {
        return content;
    }

    public void setResponseCode(int responseCode) {
        this.responseCode = responseCode;
    }

    public void setContent(String content) {
        this.content = content;
    }
}
