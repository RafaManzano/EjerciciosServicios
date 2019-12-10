package ies.nervion.rmanzano.callback;

import ies.nervion.rmanzano.clases.Libro;
import okhttp3.RequestBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import okhttp3.Headers;

import java.io.IOException;
import java.util.List;


public class PostLibroCallback implements Callback<Libro> {


    @Override
    public void onResponse(Call<Libro> call, Response<Libro> resp) {
        // TODO Auto-generated method stub
        Libro libro = null;
        String contentType;
        int code;
        String message;
        boolean isSuccesful;

        libro = resp.body();

        Headers cabeceras = resp.headers();
        contentType = cabeceras.get("Content-Type");
        code = resp.code();
        message = resp.message();
        isSuccesful = resp.isSuccessful();


        System.out.println(libro.getCodigo() + libro.getTitulo() + libro.getNumpag());
    }


    @Override
    public void onFailure(Call<Libro> call, Throwable throwable) {
        int i = 0;
    }
}
