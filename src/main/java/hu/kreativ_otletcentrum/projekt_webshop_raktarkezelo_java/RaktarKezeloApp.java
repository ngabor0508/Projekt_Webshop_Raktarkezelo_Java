package hu.kreativ_otletcentrum.projekt_webshop_raktarkezelo_java;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.scene.image.Image;
import javafx.stage.Stage;

import java.io.IOException;

public class RaktarKezeloApp extends Application {
    public static String nev;

    @Override
    public void start(Stage stage) throws IOException {
        FXMLLoader fxmlLoader = new FXMLLoader(RaktarKezeloApp.class.getResource("fxml/bejelentkezes-view.fxml"));
        Scene scene = new Scene(fxmlLoader.load(), 600, 300);
        stage.setTitle("Kreatív Ötletcentrum Raktárkezelő Bejelentkezés");
        stage.setResizable(false);
        stage.setScene(scene);
        Image icon = new Image(getClass().getResourceAsStream("images/kreativ_logo.png"));
        stage.getIcons().add(icon);
        stage.show();
    }

    public static void main(String[] args) {
        launch();
    }
}