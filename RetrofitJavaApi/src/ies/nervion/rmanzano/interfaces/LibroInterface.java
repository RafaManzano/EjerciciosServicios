package ies.nervion.rmanzano.interfaces;

import ies.nervion.rmanzano.clases.Libro;
import retrofit2.Call;
import retrofit2.http.*;

import java.util.List;


public interface LibroInterface {
	@GET("/libro/{id}")
	Call<List<Libro>> getLibro(@Path("id") int id);

	@GET("/libro")
	Call<List<Libro>> getLibro();

    @Headers({"Content-type:application/json"})
    @POST("/libro")
    Call<Void> postLibro(@Body Libro libro);

    @PUT("/libro")
	Call<Void> putLibro(@Body Libro libro);

    @DELETE("/libro/{id}")
	Call<Void> deleteLibro(@Path("id")int id);

}
