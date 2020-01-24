package ies.nervion.rmanzano.main;

import ies.nervion.rmanzano.callback.LibroCallback;
import ies.nervion.rmanzano.callback.PostLibroCallback;
import ies.nervion.rmanzano.callback.VoidLibroCallback;
import ies.nervion.rmanzano.clases.Libro;
import ies.nervion.rmanzano.interfaces.LibroInterface;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class Main {
    private static String SERVER_URL = "http://biblioteca.devel:8080/";

    public static void main(String[] args) {

            Retrofit retrofit;
            LibroCallback libroCallback = new LibroCallback();
            PostLibroCallback postLibroCallback = new PostLibroCallback();
            VoidLibroCallback voidLibroCallback = new VoidLibroCallback();


            retrofit = new Retrofit.Builder()
                    .baseUrl(SERVER_URL)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();

            LibroInterface libroInter = retrofit.create(LibroInterface.class);

            //libroInter.getLibro().enqueue(libroCallback);
            //libroInter.getLibro(1234).enqueue(libroCallback);

            //libroInter.postLibro(new Libro( "LibroNuevo", 2)).enqueue(postLibroCallback);

            //libroInter.putLibro(new Libro(4, "Modificando Put desde Intelij", 25)).enqueue(postLibroCallback);

            //libroInter.deleteLibro(1234).enqueue(voidLibroCallback);

            //libroInter.getLibro().enqueue(libroCallback);

        }
}
