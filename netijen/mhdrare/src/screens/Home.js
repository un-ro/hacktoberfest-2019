import React, { Component } from "react";
import { connect } from "react-redux";
import { getPokemon, getPokemonById } from "../publics/redux/actions/pokemon";
import { getType, getPokemonByType } from "../publics/redux/actions/filterType";
import Header from "../components/Header";
import Details from "../components/Details";
import "../assets/styles.css";

class Home extends Component {
	constructor(props) {
		super(props);
		this.state = {
			pokemon: [],
			pokemonByType: [],
			details: [],
			type: [],
			isLoading: true
		};
	}

	componentDidMount = async () => {
		await this.props.dispatch(getPokemon());
		await this.props.dispatch(getType());
		this.setState({
			pokemon: this.props.pokemon,
			type: this.props.filterType,
			isLoading: false
		});
	};

	getByType = async id => {
		await this.props.dispatch(getPokemonByType(id));
		this.setState({
			pokemonByType: this.props.filterType.details
		});
	};

	getDetails = async id => {
		await this.props.dispatch(getPokemonById(id));
		this.setState({
			details: this.props.pokemon.details
		});
	};

	render() {
		return (
			<div className="container">
				<div className="details">
					<Details data={this.state.details} />
				</div>
				<div className="list">
					<Header />
					<div className="list-poke">
						{this.state.isLoading ? (
							<p className="loading">Loading...</p>
						) : this.state.pokemonByType == "" ? (
							this.state.pokemon.data.results.map(
								(item, index) => {
									return (
										<div
											key={index}
											onClick={() =>
												this.getDetails(index + 1)
											}
										>
											<div className="name">
												{item.name}
											</div>
										</div>
									);
								}
							)
						) : (
							this.state.pokemonByType.map((item, index) => {
								return (
									<div
										key={index}
										onClick={() =>
											this.getDetails(item.pokemon.name)
										}
									>
										<div className="name">
											{item.pokemon.name}
										</div>
									</div>
								);
							})
						)}
					</div>
					<div className="filter">
						<div className="type">
							{this.state.isLoading ? (
								<p className="loading">Loading...</p>
							) : (
								this.state.type.data.results.map(
									(item, index) => {
										return (
											<div
												key={index}
												className="type-poke"
												onClick={() =>
													this.getByType(index + 1)
												}
											>
												{item.name}
											</div>
										);
									}
								)
							)}
						</div>
					</div>
				</div>
			</div>
		);
	}
}

const mapStateToProps = state => {
	return {
		pokemon: state.pokemon,
		filterType: state.filterType
	};
};

export default connect(mapStateToProps)(Home);
