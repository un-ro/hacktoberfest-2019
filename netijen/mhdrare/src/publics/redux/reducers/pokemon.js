const initialState = {
    data: [],
    details: [],
    isLoading: false,
    isError: false
};

export default (state = initialState, action) => {
    switch (action.type) {
        case "GET_POKEMON_PENDING":
            return {
                ...state,
                isLoading: true
            };
        case "GET_POKEMON_FULFILLED":
            return {
                ...state,
                isLoading: false,
                isError: false,
                data: action.payload.data
            };
        case "GET_POKEMON_REJECTED":
            return {
                ...state,
                isLoading: false,
                isError: true
            };
        case "DETAILS_POKEMON_PENDING":
            return {
                ...state,
                isLoading: true
            };
        case "DETAILS_POKEMON_FULFILLED":
            return {
                ...state,
                isLoading: false,
                isError: false,
                details: action.payload.data
            };
        case "DETAILS_POKEMON_REJECTED":
            return {
                ...state,
                isLoading: false,
                isError: true
            };
        default:
            return state;
    }
};
