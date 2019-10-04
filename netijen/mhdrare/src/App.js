import React from "react";
import { Provider } from "react-redux";
import store from "./publics/redux/store";
import Home from "./screens/Home";

function App() {
	return (
		<Provider store={store}>
			<Home />
		</Provider>
	);
}

export default App;
