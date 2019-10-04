import { combineReducers } from "redux";
import pokemon from "./pokemon";
import filterType from "./filterType";

const appReducer = combineReducers({
	pokemon,
	filterType
});

export default appReducer;
