import React, { Component, Fragment } from "react";
import "../assets/styles.css";
import logo from "../assets/images/pokemon-icon.png";

export default class Details extends Component {
	constructor(props) {
		super(props);

		this.state = {
			isNull: "None"
		};
	}
	render() {
		return (
			<Fragment>
				{this.props.data == "" ? (
					<div className="blank">
						<img className="logo" src={logo} alt="" />
					</div>
				) : (
					<Fragment>
						<div className="header">
							<div className="title">Details Pokémon</div>
						</div>
						<div className="body">
							<div className="pokemon-image">
								<img
									src={
										this.props.data.sprites.front_default ==
										null
											? logo
											: this.props.data.sprites
													.front_default
									}
									alt="Front"
									className="image"
								/>
							</div>
							<div className="pokemon-name">
								{this.props.data.name} - #
								{this.props.data.order}
							</div>
							<div className="pokemon-type">
								{this.props.data.types.map((item, index) => {
									return (
										<div key={index} className="type">
											{item.type.name}
										</div>
									);
								})}
							</div>
							<div>
								<span className="details-title">Abilities</span>
								<div className="details-data">
									{this.props.data.abilities.map(
										(item, index) => {
											return (
												<div
													key={index}
													className="details-name"
												>
													{item.ability.name}
												</div>
											);
										}
									)}
								</div>
							</div>
							<div>
								<span className="details-title">
									Held Items
								</span>
								<div className="details-data">
									{this.props.data.held_items == "" ? (
										<div className="details-name">
											{this.state.isNull}
										</div>
									) : (
										<span></span>
									)}
									{this.props.data.held_items.map(
										(item, index) => {
											return (
												<div
													key={index}
													className="details-name"
												>
													{item.item.name}
												</div>
											);
										}
									)}
								</div>
							</div>
							<div>
								<span className="details-title">
									Base Experience
								</span>
								<div className="details-data">
									<div className="details-name">
										{this.props.data.base_experience}
									</div>
								</div>
							</div>
							<div>
								<span className="details-title">Height</span>
								<div className="details-data">
									<div className="details-name">
										{this.props.data.height}
									</div>
								</div>
							</div>
							<div>
								<span className="details-title">Weight</span>
								<div className="details-data">
									<div className="details-name">
										{this.props.data.weight}
									</div>
								</div>
							</div>
							<div>
								<span className="details-title">Stats</span>
								<div className="details-stats">
									{this.props.data.stats.map(
										(item, index) => {
											return (
												<div
													key={index}
													className="details-stats-name"
												>
													<div className="stats-name">
														{item.stat.name}
													</div>
													<div className="base-stats">
														{item.base_stat}
													</div>
												</div>
											);
										}
									)}
								</div>
							</div>
						</div>
					</Fragment>
				)}
			</Fragment>
		);
	}
}
