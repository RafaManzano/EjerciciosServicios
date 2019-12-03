package ies.nervion.rmanzano.interfaces;

import ies.nervion.rmanzano.clases.Libro;
import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.POST;
import retrofit2.http.Path;

import java.util.List;


public interface LibroInterface {
	@GET("libro/{id}")
	Call<List<Libro>> getLibro(@Path("id") int id);

	@GET("/libro")
	Call<List<Libro>> getLibro();

	@POST("/libro")
	Call<Libro> postLibro(@Body Libro libro);

}
