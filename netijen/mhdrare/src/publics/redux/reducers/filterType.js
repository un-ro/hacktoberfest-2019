const initialState = {
    data: [],
    details: [],
    isLoading: false,
    isError: false
};

export default (state = initialState, action) => {
    switch (action.type) {
        case "GET_TYPE_PENDING":
            return {
                ...state,
                isLoading: true
            };
        case "GET_TYPE_FULFILLED":
            return {
                ...state,
                isLoading: false,
                isError: false,
                data: action.payload.data
            };
        case "GET_TYPE_REJECTED":
            return {
                ...state,
                isLoading: false,
                isError: true
            };
        case "TYPE_POKEMON_PENDING":
            return {
                ...state,
                isLoading: true
            };
        case "TYPE_POKEMON_FULFILLED":
            return {
                ...state,
                isLoading: false,
                isError: false,
                details: action.payload.data.pokemon
            };
        case "TYPE_POKEMON_REJECTED":
            return {
                ...state,
                isLoading: false,
                isError: true
            };
        default:
            return state;
    }
};
