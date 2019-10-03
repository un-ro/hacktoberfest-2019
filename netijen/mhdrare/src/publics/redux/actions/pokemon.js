import axios from "axios";

const url = "https://pokeapi.co/api/v2/pokemon";

export const getPokemon = () => {
	return {
		type: "GET_POKEMON",
		payload: axios.get(`${url}/?offset=0&limit=1000`)
	};
};

export const getPokemonById = id => {
	return {
		type: "DETAILS_POKEMON",
		payload: axios.get(`${url}/${id}`)
	};
};
