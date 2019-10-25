import { createStore, applyMiddleware } from "redux";
import promiseMiddleware from "redux-promise-middleware";

import reducers from "./reducers";

const store = createStore(reducers, applyMiddleware(promiseMiddleware));

export default store;
