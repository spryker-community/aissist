# AIssistant

Ever walked into a shop and started talking with the shop assistant to figure out what you wanted? With AIssistant, we aim to provide a seamless experience, helping you out with your shopping decisions.

## 📹 Team Demo

[To be updated]

## Pre-requisite

* OpenAI account with some credits
* Configured assistant, which can be created using the OpenAI Playground
* Upload existing products to the OpenAI Playground as a JSON file

![Upload JSON information](docs/vector_store.png)

TODO: prepare a script to export JSON from your products in the demoshop

## Installation

1. Clone the repository
2. Install Spryker like a usual B2C demoshop
3. Provide the config

```
$config[AissistantConstants::OPENAI_API_KEY] = 'YOUR_OPENAI_API_KEY_HERE';
$config[AissistantConstants::ASSISTANT_ID] = 'ASSISTANT_ID_HERE';
```

4. Run the following command to install additional products

```
vendor/bin/console data:import --config=data/import/common/sports_setup.yml
```

## Caveats

Currently the whole demoshop is commited to this repository, as an initial hackathon project. The extraction of the module is postponed to a later stage.
