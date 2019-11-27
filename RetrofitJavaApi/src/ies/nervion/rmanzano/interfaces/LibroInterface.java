package ies.nervion.rmanzano.interfaces;

import ies.nervion.rmanzano.clases.Libro;
import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Path;

import java.util.List;


public interface LibroInterface {
	@GET("libro/{id}")
	Call<List<Libro>> getLibro(@Path("id") int id);

}
