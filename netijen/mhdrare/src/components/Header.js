import React, { Component } from "react";
import "../assets/styles.css";
import logo from "../assets/images/logo.png";

export default class Header extends Component {
	render() {
		return (
			<div className="header">
				<div className="title">PokéDex</div>
				<img src={logo} alt="" className="logo" />
			</div>
		);
	}
}
