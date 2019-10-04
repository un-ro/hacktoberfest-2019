import React, { Component } from "react";
import { connect } from "react-redux";
import { getType } from "../publics/redux/actions/filterType";
import "../assets/styles.css";
import logo from "../assets/images/logo.png";

class Filter extends Component {
	render() {
		return (
			<div className="header">
				<div className="title">PokéDex</div>
				<img src={logo} alt="" className="logo" />
			</div>
		);
	}
}

const mapStateToProps = state => {
	return {
		filteType: state.filterType
	};
};

export default connect(mapStateToProps)(Filter);
