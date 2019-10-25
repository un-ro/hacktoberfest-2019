import axios from "axios";

const url = "https://pokeapi.co/api/v2/type";

export const getType = () => {
	return {
		type: "GET_TYPE",
		payload: axios.get(`${url}`)
	};
};

export const getPokemonByType = id => {
	return {
		type: "TYPE_POKEMON",
		payload: axios.get(`${url}/${id}`)
	};
};
